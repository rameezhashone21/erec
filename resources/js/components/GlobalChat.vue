<template>
    <div class="chat__box__single__main">
        <audio id="not-play">
            <source
                src="https://e-rec.com.au/storage/message-tone.mp3"
                type="audio/ogg"
            />
            <source
                src="https://e-rec.com.au/storage/message-tone.mp3"
                type="audio/mpeg"
            />
        </audio>
        <div
            class="d-flex flex-row-reverse align-items-end"
            style="gap: 0 10px"
        >
            <div class="chat__box">
                <div
                    class="d-flex align-items-center justify-content-between p-1"
                    id="chatBox"
                >
                    <div class="d-flex align-items-center">
                        <div v-if="user.company">
                            <img
                                v-if="user.company.logo"
                                :src="
                                    fullUrl +
                                    '/storage/' +
                                    user.company.logo
                                "
                                alt=""
                                class="profile_thumb rounded-50"
                            />
                            <img
                                v-else
                                src="https://e-rec.com.au/adminpanel/images/avatar/dummy.png"
                                alt=""
                                class="profile_thumb rounded-50"
                            />
                        </div>
                        <div v-if="user.recruiter">
                            <img
                                v-if="user.recruiter.avatar"
                                :src="
                                    fullUrl +
                                    '/storage/' +
                                    user.recruiter.avatar
                                "
                                alt=""
                                class="profile_thumb rounded-50"
                            />
                            <img
                                v-else
                                src="https://e-rec.com.au/adminpanel/images/avatar/dummy.png"
                                alt=""
                                class="profile_thumb rounded-50"
                            />
                        </div>
                        <div v-if="user.candidate">
                            <img
                                v-if="user.avatar"
                                :src="
                                    fullUrl + '/storage/' + user.avatar
                                "
                                alt=""
                                class="profile_thumb rounded-50"
                            />
                            <img
                                v-else
                                src="https://e-rec.com.au/adminpanel/images/avatar/dummy.png"
                                alt=""
                                class="profile_thumb rounded-50"
                            />
                        </div>
                        <div class="fs-14 ms-2">
                            Messages<span
                                v-if="connected.totalunreadmsg != 0"
                                class="badge bg-primary"
                                >{{ connected.totalunreadmsg }}</span
                            ><span
                                class="badge bg-primary"
                                id="totalnoticount"
                            ></span>
                        </div>
                    </div>
                    <div class="d-flex" style="gap: 10px">
                        <i class="fa-solid fa-chevron-up"></i>
                    </div>
                </div>
                <div class="border-top" id="chatBoxList" style="display: none">
                    <div class="px-2 mt-2">
                        <div class="position-relative message_search_box">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input
                                type="text"
                                placeholder="Search Messages"
                                id="search-box"
                                @keyup="search()"
                            />
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="filter"
                                viewBox="0 0 16 16"
                                data-supported-dps="16x16"
                                fill="currentColor"
                                width="16"
                                height="16"
                                focusable="false"
                            >
                                <path
                                    d="M15 2v2H6.72a2 2 0 01-3.44 0H1V2h2.28a2 2 0 013.44 0H15zm-4 4a2 2 0 00-1.72 1H1v2h8.28a2 2 0 003.45 0H15V7h-2.28A2 2 0 0011 6zm-6 5a2 2 0 00-1.72 1H1v2h2.28a2 2 0 003.45 0H15v-2H6.72A2 2 0 005 11z"
                                ></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <ul class="mt-4 chat_list">
                            <li
                                class="d-flex fs-14 align-items-center px-2"
                                v-for="connect in connected"
                                v-if="connect.id != null"
                                v-bind:id="'chatBoxPerson-' + connect.id"
                                @click="openBox(connect.id)"
                            >
                                <div class="me-2">
                                    <!--<img
                                        v-bind:src="fullUrl+'/public/storage/'+connect.avatar"
                                        alt=""
                                        class="profile_thumb rounded-50"
                                        style="width: 50px; height: 50px"
                                    />-->
                                    <img
                                        v-if="connect.avatar"
                                        :src="
                                            fullUrl +
                                            '/storage/' +
                                            connect.avatar
                                        "
                                        alt=""
                                        class="profile_thumb rounded-50"
                                    />
                                    <img
                                        v-else
                                        src="https://e-rec.com.au/adminpanel/images/avatar/dummy.png"
                                        alt=""
                                        class="profile_thumb rounded-50"
                                    />
                                </div>
                                <div class="flex-grow-1">
                                    <div
                                        class="d-flex justify-content-between mb-1"
                                    >
                                        <div>{{ connect.name }}</div>
                                        <div
                                            style="font-size: 12px; color: #999"
                                        >
                                            {{
                                                getDate(
                                                    connect.firstmsg.created_at
                                                )
                                            }}
                                        </div>
                                    </div>
                                    <div
                                        style="
                                            font-size: 12px;
                                            color: #999;
                                            position: relative;
                                        "
                                    >
                                        You:
                                        <span
                                            v-bind:id="
                                                'first-msg-' + connect.id
                                            "
                                        >
                                            {{ connect.firstmsg.message }}
                                        </span>
                                        <span
                                            class="new-message-counter"
                                            v-if="connect.messagecount != 0"
                                            v-bind:id="
                                                'unread-count-' + connect.id
                                            "
                                            >{{ connect.messagecount }}</span
                                        >
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-3">
      </div> -->
            <div
                class="d-flex flex-row-reverse align-items-end gx-2"
                id="message-box"
                style="gap: 0 10px"
            >
                <div
                    v-bind:id="'chatBoxSingle' + msgs.comp_rec.id"
                    v-for="msgs in AllMessages"
                    class="shadow"
                >
                    <div
                        class="chat__box__single"
                        v-bind:id="'new-box-' + msgs.comp_rec.id"
                    >
                        <div class="chat-top fs-14 px-2 pt-2 border-bottom">
                            <div class="d-flex align-items-center">
                                <div class="me-2">
                                    <img
                                        v-if="msgs.comp_rec.avatar"
                                        :src="
                                            fullUrl +
                                            '/storage/' +
                                            msgs.comp_rec.avatar
                                        "
                                        alt=""
                                        class="profile_thumb rounded-50"
                                    />
                                    <img
                                        v-else
                                        src="https://e-rec.com.au/adminpanel/images/avatar/dummy.png"
                                        alt=""
                                        class="profile_thumb rounded-50"
                                    />
                                </div>
                                <div>
                                    <div>
                                        {{ msgs.comp_rec.name }}
                                    </div>
                                    <!-- <div style="font-size: 12px; color: #999">
                                        Active now
                                    </div> -->
                                </div>
                                <div
                                    class="ms-auto d-flex align-items-center"
                                    style="gap: 6px"
                                >
                                    <i
                                        class="fa-solid fa-minus"
                                        v-bind:onclick="
                                            'MinMsgBox(' +
                                            msgs.comp_rec.id +
                                            ')'
                                        "
                                        v-bind:id="'min-' + msgs.comp_rec.id"
                                    ></i>
                                    <i
                                        class="fa-solid fa-xmark"
                                        v-bind:onclick="
                                            'closeMsgBox(' +
                                            msgs.comp_rec.id +
                                            ')'
                                        "
                                        v-bind:id="msgs.comp_rec.id"
                                    ></i>
                                </div>
                            </div>
                        </div>
                        <div
                            class="message-bottom"
                            v-bind:id="'message-bottom-' + msgs.comp_rec.id"
                        >
                            <div
                                class="messages"
                                v-bind:id="'msg-box' + msgs.comp_rec.id"
                            >
                                <!-- <div
                                    class="fs-14 day d-flex align-items-center justify-content-center align-items-center my-2">
                                    <div class="day_border"></div>
                                    <div class="px-2">THURSDAY</div>
                                    <div class="day_border"></div>
                                </div> -->
                                <div
                                    class="d-flex align-items-start mb-2 px-2"
                                    v-for="write_msgs in messages"
                                    v-if="
                                        write_msgs.second_user ==
                                            msgs.comp_rec.id ||
                                        write_msgs.user_id == msgs.comp_rec.id
                                    "
                                >
                                    <div class="me-2">
                                        <img
                                            v-if="write_msgs.user.avatar"
                                            :src="
                                                fullUrl +
                                                '/storage/' +
                                                write_msgs.user.avatar
                                            "
                                            alt=""
                                            class="profile_thumb rounded-50"
                                        />
                                        <img
                                            v-else
                                            src="https://e-rec.com.au/adminpanel/images/avatar/dummy.png"
                                            alt=""
                                            class="profile_thumb rounded-50"
                                        />
                                    </div>
                                    <div>
                                        <div
                                            class="d-flex fs-14 align-items-center mb-2"
                                            style="gap: 8px"
                                        >
                                            <div>
                                                {{ write_msgs.user.name }}:
                                            </div>
                                            <div
                                                style="
                                                    font-size: 12px;
                                                    color: #999;
                                                "
                                            >
                                                {{
                                                    getNow(
                                                        write_msgs.created_at
                                                    )
                                                }}
                                            </div>
                                        </div>
                                        <div
                                            style="font-size: 12px; color: #999"
                                        >
                                            {{ write_msgs.message }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top">
                                <div
                                    class="message_send d-flex px-2 mt-3"
                                    style="gap: 6px"
                                >
                                    <div class="flex-grow-1">
                                        <textarea
                                            placeholder="Write message..."
                                            v-bind:id="
                                                'btn-input-' + msgs.comp_rec.id
                                            "
                                            v-model="
                                                newMessage[msgs.comp_rec.id]
                                            "
                                            @keyup.enter="
                                                sendMessage(
                                                    user.id,
                                                    msgs.comp_rec.id
                                                )
                                            "
                                        ></textarea>
                                    </div>
                                    <div>
                                        <button
                                            type="button"
                                            class="send-message"
                                            @click="
                                                sendMessage(
                                                    user.id,
                                                    msgs.comp_rec.id
                                                )
                                            "
                                        >
                                            <i
                                                class="fa-solid fa-paper-plane"
                                                v-bind:id="
                                                    'btn-chat-' +
                                                    msgs.comp_rec.id
                                                "
                                            ></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div v-if="user.role == 'rec'" class="chat__box__single">
                        <div class="chat-top fs-14 px-2 pt-2 border-bottom">
                            <div class="d-flex align-items-center">
                                <div class="me-2">
                                    <img
                                        src="https://check.hostingladz.com/webapp/Erec/storage/candidateAvatar/img/2022-11-25_.113.85714285714_.jpg"
                                        alt=""
                                        class="profile_thumb rounded-50"
                                    />
                                </div>
                                <div>
                                    <div>
                                        {{ msgs.comp_rec.name }}
                                    </div>
                                    <div style="font-size: 12px; color: #999">
                                        Active now
                                    </div>
                                </div>
                                <div
                                    class="ms-auto d-flex align-items-center"
                                    style="gap: 6px"
                                >
                                    <i
                                        class="fa-solid fa-plus"
                                        v-bind:onclick="
                                            'MinMsgBox(' +
                                            msgs.comp_rec.id +
                                            ')'
                                        "
                                    ></i>
                                    <i
                                        class="fa-solid fa-xmark"
                                        v-bind:onclick="
                                            'closeMsgBox(' +
                                            msgs.comp_rec.id +
                                            ')'
                                        "
                                        v-bind:id="msgs.comp_rec.id"
                                    ></i>
                                </div>
                            </div>
                        </div>
                        <div
                            class="message-bottom"
                            v-bind:id="
                                'message-bottom-' + msgs.comp_rec.id
                            "
                        >
                            <div class="messages">
                                <div
                                    class="fs-14 day d-flex align-items-center justify-content-center align-items-center my-2"
                                >
                                    <div class="day_border"></div>
                                    <div class="px-2">THURSDAY</div>
                                    <div class="day_border"></div>
                                </div>
                                <div
                                    class="d-flex align-items-start mb-2 px-2"
                                    v-for="write_msgs in messages"
                                    v-if="
                                        write_msgs.second_user ==
                                        msgs.comp_rec.id ||
                                        write_msgs.user_id ==
                                        msgs.comp_rec.id
                                    "
                                >
                                    <div class="me-2">
                                        <img
                                            src="https://check.hostingladz.com/webapp/Erec/storage/candidateAvatar/img/2022-11-25_.113.85714285714_.jpg"
                                            alt=""
                                            class="profile_thumb rounded-50"
                                        />
                                    </div>
                                    <div>
                                        <div
                                            class="d-flex fs-14 align-items-center mb-2"
                                            style="gap: 8px"
                                        >
                                            <div>
                                                {{
                                                    write_msgs.user
                                                        .name
                                                }}:
                                            </div>
                                            <div
                                                style="
                                                    font-size: 12px;
                                                    color: #999;
                                                "
                                            >
                                                {{
                                                    getNow(
                                                        write_msgs.created_at
                                                    )
                                                }}
                                            </div>
                                        </div>
                                        <div
                                            style="font-size: 12px; color: #999"
                                        >
                                            {{ write_msgs.message }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top">
                                <div
                                    class="message_send d-flex px-2 mt-3"
                                    style="gap: 6px"
                                >
                                    <div class="flex-grow-1">
                                        <textarea
                                            placeholder="Write message..."
                                            id="btn-input"
                                            v-model="newMessage"
                                            @keyup.enter="
                                                sendMessage(
                                                    user.id,
                                                    msgs.comp_rec.id
                                                )
                                            "
                                        ></textarea>
                                    </div>
                                    <div>
                                        <button
                                            type="button"
                                            class="send-message"
                                            @click="
                                                sendMessage(
                                                    user.id,
                                                    msgs.comp_rec.id
                                                )
                                            "
                                        >
                                            <i
                                                class="fa-solid fa-paper-plane"
                                                id="btn-chat"
                                            ></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- <div class="col-lg-9">
      </div> -->
        </div>
    </div>
</template>
<script>
let checkInterval = null;
export default {
    props: [
        "user",
        "messages",
        "connected",
        "route_fetch_indivisual",
        "route_fetch",
    ],

    data() {
        return {
            chatShow: false,
            AllMessages: [],
            opens: [],
            newMessage: {},
            fullUrl: window.location.origin,
        };
    },
    mounted: function () {
        const $this = this;

        checkInterval = setInterval(() => {
            const getIds = JSON.parse(localStorage.getItem("message_ids"));

            if (getIds?.length > 0) {
                getIds.map((id) => {
                    $this.openBox(id);
                });
                localStorage.removeItem("message_ids");
            }
        }, 1000);
    },
    beforeDestroy: function () {
        clearInterval(checkInterval);
    },
    computed: {},
    methods: {
        getSingleChatId(msg) {
            console.log(msg?.comp_rec?.rec_id);
            return msg?.comp_rec?.rec_id
                ? `chatBoxSingle${msg.comp_rec.rec_id}`
                : null;
        },
        getNow(date) {
            let preDateTime = new Date(date);
            let newTime = preDateTime.toLocaleTimeString("en-US");
            let newDate = preDateTime.toLocaleDateString();
            let newDay = preDateTime.getDay();
            let hour = newTime.split(":")[0];
            let amPm = newTime.split(" ")[1];
            let seconds = newTime.split(":")[2].replace(amPm, "");

            let noAmPm = newTime.replace(amPm, "");
            let noAmPmSeconds = noAmPm.replace(":" + seconds, "");
            let noSeconds = newTime.replace(":" + seconds, " ");

            if (parseInt(hour) < 9) {
                newTime = "0" + newTime;
                noAmPm = "0" + noAmPm;
                noSeconds = "0" + noSeconds;
                noAmPmSeconds = "0" + noAmPmSeconds;
            }
            let date_time = noSeconds;
            return date_time;
        },
        getDate(date) {
            let preDateTime = new Date(date);
            let newTime = preDateTime.toLocaleTimeString("en-US");
            let newDate = preDateTime.toLocaleDateString();
            let newDay = preDateTime.getDay();
            let hour = newTime.split(":")[0];
            let amPm = newTime.split(" ")[1];
            let seconds = newTime.split(":")[2].replace(amPm, "");

            let noAmPm = newTime.replace(amPm, "");
            let noAmPmSeconds = noAmPm.replace(":" + seconds, "");
            let noSeconds = newTime.replace(":" + seconds, " ");

            if (parseInt(hour) < 9) {
                newTime = "0" + newTime;
                noAmPm = "0" + noAmPm;
                noSeconds = "0" + noSeconds;
                noAmPmSeconds = "0" + noAmPmSeconds;
            }
            let date_time = newDate;
            return date_time;
        },
        sendMessage(comp_id, new_rec) {
            console.log(this.newMessage);
            const message = this.newMessage[new_rec]; // Get the message for the specific chat box
            this.$emit("messagesent", {
                user: comp_id,
                message: message,
                second_user: new_rec,
            });
            this.newMessage[new_rec] = "";
            $("#first-msg-" + new_rec).html(message); // Clear the message for this chat box
            // const element = document.getElementById("msg-box" + new_rec);
            // element.scrollTop = element.scrollHeight;
            // Example usage:
            var $this = this;
            setTimeout(function () {
                var div = document.getElementById("msg-box" + new_rec);
                $this.smoothScrollToBottom(div);
            }, 500);
            // console.log();
            // this.methods.smoothScrollToBottom(div);
            window.dispatchEvent(
                new CustomEvent("search-chat", { detail: { value: "" } })
            );
        },
        openBox(id) {
            const $this = this;
            // console.log($this);
            const check = $("#new-box-" + id).html();
            if ($this.$data.opens.includes(id) || check) return;
            $this.$data.opens.push(id);

            $.ajax({
                url: this.$props.route_fetch_indivisual,
                type: "GET",
                data: {
                    id: id,
                },
                // dataType: "json",
                // encode: true,
            })
                .done(function (data) {
                    $this.$data.AllMessages.push(data);
                    $this.$data.opens = [];
                    $("#unread-count-" + id).css("display", "none"); // Clear the message for this chat box
                    setTimeout(function () {
                        var divs = document.getElementsByClassName("messages"); // Replace 'yourClassName' with the actual class name of your div
                        console.log(divs.length);
                        if (divs.length > 0) {
                            console.log($this);
                            // var div = divs[0]; // Assuming you want to scroll the first div with the specified class name
                            for (let i = 0; i < divs.length; i++) {
                                $this.smoothScrollToBottom(divs[i]);
                            }
                            // Scroll to the bottom of the div
                        }
                    }, 1000);
                })
                .fail(function (error) {
                    console.log(error);
                    var errors = error.responseJSON;
                    console.log(errors);
                });
        },
        smoothScrollToBottom(element) {
            var currentScrollPosition = element.scrollTop;
            var scrollHeight = element.scrollHeight;
            var duration = 500; // Adjust the duration as needed
            var startTime = null;

            function step(currentTime) {
                if (!startTime) {
                    startTime = currentTime;
                }

                var progress = currentTime - startTime;
                var targetScrollPosition = currentScrollPosition + scrollHeight;
                element.scrollTop = easeInOutQuad(
                    progress,
                    currentScrollPosition,
                    targetScrollPosition - currentScrollPosition,
                    duration
                );

                if (progress < duration) {
                    requestAnimationFrame(step);
                }
            }
            function easeInOutQuad(t, b, c, d) {
                t /= d / 2;
                if (t < 1) return (c / 2) * t * t + b;
                t--;
                return (-c / 2) * (t * (t - 2) - 1) + b;
            }

            requestAnimationFrame(step);
        },

        search() {
            var search_val = $("#search-box").val();

            window.dispatchEvent(
                new CustomEvent("search-chat", {
                    detail: { value: search_val },
                })
            );

            // console.log(search_val);
        },
    },
};
</script>
