<template>
    <div class="mesgs" >
		<div class="msg_history" id="dash-chat-content">
			<div class="incoming_msg">
			    <div class="received_msg">
					<div v-for="message in messages" v-bind:key="message.id"  :class="{'received_msg': message.author===authUser.email, 'outgoing_msg': message.author!==authUser.email}">
  						<div :class="{'received_withd_msg': message.author===authUser.email, 'sent_msg': message.author!==authUser.email}">
      						<p class="bs-tooltip" title="Add Course" data-original-title="Add Course">{{ message.body }}</p>      						
      						<span class="time_date"> 
      						    {{ getMonth(message.timestamp.getMonth()) }} 
      						    {{ message.timestamp.getDate() }}, 
      						    {{padding_zero(message.timestamp.getHours())}}:{{padding_zero(message.timestamp.getMinutes())}} 
      						</span>
  						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="type_msg">
			<div class="input_msg_write">
				<input type="text" 
				    v-model="newMessage"
				    class="write_msg" 
				    placeholder="Type a message" 
				    />
				    <button class="msg_send_btn" type="button" @click="sendMessage" ><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
			</div>
		</div>
	</div>
</template>

<script>
export default {
    name: "UserComponent",
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
            channel: "",
            MonthNames: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        };
    },
    
    mounted() {
        // console.log(this.lastMessage);
    },
    
    computed: {
        lastMessage: function() {
            return this.messages[this.messages.length - 1];
        }
        
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
                $('#dash-chat-content').scrollTop(1000000);
            });
        },
        async fetchMessages() {
            this.messages = (await this.channel.getMessages()).items;
            $('#dash-chat-content').scrollTop(1000000);
        },
        sendMessage() {
            if(this.newMessage){
                this.channel.sendMessage(this.newMessage);
            }
            this.newMessage = "";
            
            setTimeout(() => {
                $.ajax({
                    headers: {
 						'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
 					},
                    url: this.storeUrl,
                    method: 'post',
                    dataType: 'json',
                    data: {
                        "message": this.lastMessage.body, 
                        "authUser_id": this.authUser.id, 
                    },
                    success: function(data) {
                        console.log(data);
                    },
                    
                });
            }, 5*1000);
            
        },
        
        padding_zero(num) {
            if(num < 10) return '0' + num;
        },
        
        getMonth(mon){
            return this.MonthNames[mon];
        }
    }
};
</script>