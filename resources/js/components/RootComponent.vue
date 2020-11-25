<template>
    <div class="container">
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        mounted() {
            this.fetchComments();
        },
        data() {
            return {
                comments: [], 
                errors: []
            }
        },
        methods: {
            fetchComments: function() {
                return axios.get('/comments')
                    .then((res) => {
                        this.comments.push(res.data);
                    }).catch((err) => {
                        this.errors.push(
                            {
                                reason: err,
                                message: "There was an error fetching comments"
                            }
                        )
                    }) 
            }
        }
    }
</script>
