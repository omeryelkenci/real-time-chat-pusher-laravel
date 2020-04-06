<template>
    <div class="type_msg">
        <div class="input_msg_write">
            <input type="text" name="message" class="write_msg" placeholder="Type a message" v-model="newMessage" @keyup.enter="sendMessage" />
            <button class="msg_send_btn" type="button" @click="sendMessage"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user'],

        data() {
            return {
                newMessage: ''
            }
        },

        methods: {
            sendMessage() {
                this.$emit('messagesent', {
                    user: this.user,
                    message: this.newMessage
                });

                this.newMessage = ''
            }
        }    
    }
</script>