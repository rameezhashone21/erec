<template>
    <ul class="chat">
        <div v-for="message in messages">
            <li class="left clearfix" v-if="message.second_user == second_user">
                <div class="chat-body clearfix" >
                    <div class="header">
                        <strong class="primary-font">
    
                            {{ message.user.name }}
                        </strong>
                    </div>
                    <p>
                        {{ message.message }}
                    </p>
                </div>
            </li>
        </div>
    </ul>
</template>

<script>
  export default {
    props: ['messages','auth_user','second_user']
  };

</script>
