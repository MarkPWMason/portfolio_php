<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\skills;
use App\Models\images;
use Illuminate\Http\Request;

class PostController extends Controller
{

    function gen_uuid()
    {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),

            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,

            // 48 bits for "node"
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
    }

    public function publishPost(Request $request)
    {

        $incomingFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'link' => 'required',
            'better' => 'required',
            'madeWith' => 'required',
        ]);

        $post = new post();
        $post->title = strip_tags($incomingFields['title']);
        $post->description = strip_tags($incomingFields['description']);
        $post->better = strip_tags($incomingFields['better']);
        $post->madeWith = strip_tags($incomingFields['madeWith']);
        $post->link = strip_tags($incomingFields['link']);
        //id doesn't exist here
        $post->save();

        //id is here because the post was saved
        $post_id = $post->id;

        $skills = $request->languages;
        foreach ($skills as $skill) {
            $skillModel = new skills();
            $skillModel->post_id = $post_id;
            $skillModel->skill = $skill;

            $skillModel->save();
        }


        $images = $request->file('screenshots');
        foreach ($images as $image) {
            $imageModel = new images();
            $imageModel->post_id = $post->id;
            $filename = $this->gen_uuid() . time() . $image->getClientOriginalName();
            $imageModel->imageUrl = $filename;
            //make sure image names never collide
            $image->storeAs('portfolioScreenshots/', $filename, 's3');
            $imageModel->save();
        }

        return redirect('/create-post');
    }

    public function showPost($id)
    {
        $post = post::where('posts.id', $id)->firstOrFail();
        return view('post', ['post' => $post]);
    }
}
