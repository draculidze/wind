<?php

namespace App\Exceptions;

use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class PostException extends Exception
{
    //protected $post;

    public function __construct(private Post $post, $message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Report the exception.
     */
    public function report(): void
    {
        Log::channel('posts')->error("PostException: " . $this->getMessage() . ", post_id: {id}", [
            'id' => $this->post->id,
        ]);
    }

    /**
     * Render the exception as an HTTP response.
     */
    public function render(Request $request): Response
    {
        return response(
            ['message' => 'already exists'], Response::HTTP_BAD_REQUEST
        );
    }
}
