<?php namespace App\Http\Controllers\User;

use App\Eloquent\Message;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

/**
 * Class MessageController
 * @package App\Http\Controllers\User
 */
class MessageController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @Get("/messages")
     *
     * @return Response
     */
    public function inbox()
    {
        $messages = Message::with('sender')->whereTo($this->logged_user->id)->get();

        $this->data['user'] = $this->logged_user;
        $this->data['messages'] = $messages;
        $this->data['page_title'] = trans('app.messages');

        return $this->template('user.inbox');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @Post("/send-message")
     *
     * @param Request $request
     * @return Response
     * @throws \Exceptionp
     */
    public function store(Request $request)
    {
        $data = [
            'from'    => $request->get('from'),
            'to'      => $request->get('to'),
            'subject' => $request->get('subject'),
            'message' => $request->get('content')
        ];

        return Response::json(Message::send($data));
    }

    /**
     * Display the specified resource.
     * @Get("/message/{id}")
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $message = Message::whereId($id)->first();

        if (! $message)
        {
            dd('message id not found');
        }


        $this->data['user'] = $this->logged_user;
        $this->data['message'] = $message;
        $this->data['page_title'] = trans('app.view_message');

        return $this->template('user.show-message');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
