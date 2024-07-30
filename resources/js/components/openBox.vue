<template>
    <a
        href="javascript:void(0);"
        class="d-flex aling-items-center button"
        @click="callOpenBoxFunction()"
        ><span>
            <svg xmlns="http://www.w3.org/2000/svg" width="14.95" height="14.95" viewBox="0 0 14.95 14.95">
              <path id="Icon_feather-message-square" data-name="Icon feather-message-square"
                d="M18.25,13.667a1.528,1.528,0,0,1-1.528,1.528H7.556L4.5,18.25V6.028A1.528,1.528,0,0,1,6.028,4.5H16.722A1.528,1.528,0,0,1,18.25,6.028Z"
                transform="translate(-3.9 -3.9)" fill="none" stroke="#007ba7" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="1.2">
              </path>
            </svg>
          </span>
          <span>
            Message
          </span>
          </a
    >
</template>
<script>
import global from "./GlobalChat.vue";
export default {
    props: [
        {
            openBoxFunction: Function,
        },
        "id",
    ],
    mounted: function () {
        // console.log(this.$props.route_fetch_indivisual);
    },
    methods: {
        callOpenBoxFunction() {
            const id = this.$props.id;
            const localItem = localStorage.getItem("message_ids");
            if (localItem) {
                const items = [...JSON.parse(localItem), id];
                localStorage.setItem("message_ids", JSON.stringify(items));
            } else {
                localStorage.setItem("message_ids", JSON.stringify([id]));
            }
        },
    },
};
</script>
