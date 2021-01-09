<template>
    <div class="container">
        <button @click="likePost"
            class="ml-4 btn btn-primary btn-sm" 
            v-bind:class="{'btn-secondary': status}" 
            v-text="buttonText">
        </button>
    </div>
</template>

<script>
    export default {

        props:['postId', 'likes'],

        mounted() {
            console.log('Component mounted.')
        },

        data: function () {
            return {
                status: this.likes,
            }
        },

        methods: {
            likePost() {
                axios.post('/like/' + this.postId)
                .then(response => this.status = !this.status)
                .catch(errors => {
                    if (errors.response.status == 401) {
                        window.location = '/login';
                    }
                });
            }
        },

        computed: {
            buttonText() {
                return (this.status) ? 'Unlike' : 'Like';
            }
        }

    }
</script>
