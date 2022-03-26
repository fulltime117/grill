<div id="app">
    <chat-component :auth-user="{{ $admin }}" :other-user="{{ $user }}" store-url="{{ route('message.store') }}"></chat-component>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="https://media.twiliocdn.com/sdk/js/chat/v3.3/twilio-chat.min.js"></script>