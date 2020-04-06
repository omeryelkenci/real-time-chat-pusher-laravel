<template>
	<div ref="messagesContainer" class="msg_history">
		<div v-for="message in messages">
			<div v-if="message.user.id !== auth_user_id" class="incoming_msg">
				<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
				<div class="received_msg">
					<div class="received_withd_msg">
						<p>{{ message.message }}</p>
						<span class="time_date"> {{ message.created_at }}</span>
					</div>
				</div>
			</div>
			<div v-if="message.user.id === auth_user_id" class="outgoing_msg">
				<div class="sent_msg">
					<p>{{ message.message }}</p>
					<span class="time_date"> {{ message.created_at }}</span>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: ['messages', 'auth_user_id'],

		updated() {
			var content = this.$refs.messagesContainer;
            content.scrollTop = content.scrollHeight
		}
	}
</script>