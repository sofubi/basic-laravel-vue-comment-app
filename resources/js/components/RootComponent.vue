<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-offset-3">
                <div v-for="(comment, key) in allComments" :key="key">
                    <div>
                        <span>{{ comment.username }}</span>
                        <hr>
                        <p>{{ comment.content }}</p>
                        <textarea name="" id="" cols="30" rows="10"></textarea>
                        <button @click="replyToComment">Reply</button>
                        <div class="row">
                            <span v-if="comment.replies.length > 0">Replies: </span>
                            <div class="col-12 border" v-for="(reply, key) in comment.replies" :key="key">
                                <span>{{ reply.username }}</span>
                                <p class="text-wrap">{{ reply.content }}</p>
                                <span v-if="reply.sub_replies.length > 0">SubReplies: </span>
                                <div class="col-12 border" v-for="(sub, key) in reply.sub_replies" :key="key">
                                    <span>{{ sub.username }}</span>
                                    <p class="text-wrap">{{ sub.content }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <select name="" id="" v-model="selectedCommentUser">
                    <option v-for="(user, key) in users" :key="key" :value="user.id">{{ user.name }}</option>
                </select>
                <textarea v-model="newComment" name="" id="" cols="30" rows="10"></textarea>
                <button @click="createComment">Comment</button>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        mounted() {
            this.fetchUsers()
            this.fetchComments()
        },
        data() {
            return {
                users: [],
                comments: [], 
                errors: [],
                selectedCommentUser: '',
                newComment: ''
            }
        },
        computed: {
            allComments: function() {
                return this.comments;
            }
        },
        methods: {
            fetchUsers: function() {
                return axios.get('/users')
                    .then((res) => {
                        this.users = res.data
                    }).catch((err) => {
                        this.errors.push(
                            {
                                reason: err,
                                message: "There was an error fetching users"
                            }
                        )
                    })
            },
            fetchComments: function() {
                return axios.get('/comments')
                    .then((res) => {
                        this.comments = res.data
                    }).catch((err) => {
                        this.errors.push(
                            {
                                reason: err,
                                message: "There was an error fetching comments"
                            }
                        )
                    }) 
            },
            createComment: function() {
                return axios.post('/comments', {
                    user_id: this.selectedCommentUser,
                    comment: this.newComment
                })
                    .then((res) => {
                    }).catch((err) => {
                        this.errors.push(
                            {
                                reason: err,
                                message: "There was an error creating your comment"
                            }
                        )
                    })
            },
            replyToComment: function() {
                
            }
        }
    }
</script>
