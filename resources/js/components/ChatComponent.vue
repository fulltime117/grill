<template>
    <div style="height: calc(100vh - 225px);">
        <div class="chat-conversation-box">
            <div id="chat-conversation-box-scroll" class="chat-conversation-box-scroll" style="margin-bottom:60px">
                <div class="chat">
                    <!-- <div class="conversation-start">
                        <span>Today, 6:48 AM</span>
                    </div> -->
                    <div v-for="message in messages" 
                        v-bind:key="message.id" 
                        class="bubble bs-tooltip"
                        :title="getTimes(message)"
                        v-bind:class="{ 'me': message.author===authUser.email, 'you': message.author!==authUser.email }">
                        {{ message.body }}
                    </div>
                </div>
            </div>
        </div>
        <div class="chat-footer">
            <div class="chat-input">
                <form class="chat-form" action="javascript:void(0);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                    <input type="text" 
                        v-model="newMessage"
                        class="mail-write-box form-control" 
                        placeholder="Type your message..."
                        @keyup.enter="sendMessage"/>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ChatComponent",
    props: {
        authUser: {
            type: Object,
            required: true
        },
        otherUser: {
            type: Object,
            required: true
        },
        storeUrl: {
            type: String,
            required: true
        },
    },
    data() {
        return {
            messages: [],
            newMessage: "",
            channel: ""
        };
    },
    async created() {
        const token = await this.fetchToken();
        await this.initializeClient(token);
        await this.fetchMessages();
    },
    methods: {
        async fetchToken() {
            const { data } = await axios.post("/api/token", {
                email: this.authUser.email
            });
            return data.token;
        },
        async initializeClient(token) {
            const client = await Twilio.Chat.Client.create(token);
            client.on("tokenAboutToExpire", async () => {
                const token = await this.fetchToken();
                client.updateToken(token);
            });
            this.channel = await client.getChannelByUniqueName(
                `${this.authUser.id}_${this.authUser.identity}`
            );
            this.channel.on("messageAdded", message => {
                this.messages.push(message);
                $.ajax({
                    headers: {
 						'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
 					},
                    url: this.storeUrl,
                    method: 'post',
                    dataType: 'json',
                    data: {"message": message.body, "email": message.author, "authUser_id": this.authUser.id, "otherUser_id": this.otherUser.id},
                    success: function(data) {
                        console.log(data);
                        if(data.type == 'unreadNotifications') {
                            $('#person_' + data.person_id).find('.toggle-message').addClass('d-none');
                        }
                    },
                    
                });
                    
                $('.chat-conversation-box').scrollTop(100000);
            });
        },
        async fetchMessages() {
            this.messages = (await this.channel.getMessages()).items;
            $('.chat-conversation-box').scrollTop(100000);
        },
        sendMessage() {
            if(this.newMessage){
                this.channel.sendMessage(this.newMessage);
            }
            this.newMessage = "";
        },
        
        getTimes(message) {
            return 'success';
        }
    }
};
</script>