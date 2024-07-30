@extends('companypanel.layout.app') @section('page_title', 'E-Rec Chat')

@section('content')
    <style>
        .chat {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .chat li {
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px dotted #B3A9A9;
        }

        .chat li .chat-body p {
            margin: 0;
            color: #777777;
        }

        .panel-body {
            overflow-y: scroll;
            height: 350px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
            background-color: #555;
        }
    </style>
    <div class="col-xl-9 col-lg-8 col-md-7">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-offset-2" id="app">
                    <div class="panel panel-default">
                        <div class="panel-heading">Chats</div>
                        {{ Auth::user()->id }}
                        <div class="panel-body">
                            <chat-messages :messages="messages" :auth_user='{{ Auth::user()->id }}'
                                second_user="{{ $sec_user->id }}"></chat-messages>
                        </div>
                        <div class="panel-footer">
                            <chat-form v-on:messagesent="addMessage" second_user="{{ $sec_user->id }}"
                                :user="{{ Auth::user() }}"></chat-form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('bottom_script')
@endsection
