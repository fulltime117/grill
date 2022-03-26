<style>
    .post-btn{
        background-color: #a79344;
        border-radius: 100px;
        color: #fff;
        padding: 12px 25px;
    }



    .post-btn:hover{
        background-color: transparent;
        color: #a79344;
        border:1px solid #a79344;
    }


</style>
<template>
    <div class="row bg-white py-5 px-2 mb-4" style="display: rtl">
        <div class="col-lg-12 mb-4">
            <div v-for="comment in comments" :key="comment.id" class="media mb-4">
                <img :src="userImg" width="90px" alt="">
                <div class="mx-2">
                    <h5>{{ comment.user.username }} said...</h5>
                    <p>{{ comment.body }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-lg-12 mb-4">
            <h4> השאירו תגובה לפוסט זה </h4>
            <div class="form-group">
                <textarea class="form-control" id="" cols="30" rows="4" v-model="commentBox"></textarea>
                <button class="btn mt-3 post-btn" v-on:click="postComment" > פרסם תגובה </button>
            </div>
        </div>        
    </div>
</template>

<script>
    export default {
        props: ['currentPost', 'authUser', 'userImg'],
        data() {
            return {
                comments: {},
                commentBox: '',
                avatar: this.userImg
            }
        },
        
        mounted() {
            this.getComments();
        },
        
        
        methods: {
            
            getComments() {
                console.log(this.authUser);
                axios
                    .get(`http://localhost:8000/api/posts/${this.currentPost.id}/comments/`)
                    .then(response => {
                        this.comments = response.data;
                        console.log(this.comments);
                    });
            },
            postComment: function() {
                axios.post(`http://localhost:8000/api/posts/${this.currentPost.id}/comments/`, {
                    body: this.commentBox,
                    user_id: this.authUser.id,
                    api_token: this.authUser.api_token
                    })
                    .then(response => {
                        console.log('respo : ',response.data);
                        this.comments.unshift(response.data);
                        this.commentBox = '';
                    });
                
            },
            
        },
    }
</script>
