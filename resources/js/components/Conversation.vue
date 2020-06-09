<template>
    <div class="conversation">
        <h1>{{ contact ? contact.name : "Select a contact" }}</h1>
        <MessagesFeed :contact="contact" :messages="messages" />
        <MessageComposer @send="sendMessage" />
    </div>
</template>

<script>
import MessagesFeed from "./MessagesFeed";
import MessageComposer from "./MessageComposer";

export default {
    components: {
        MessagesFeed,
        MessageComposer
    },
    props: {
        contact: {
            type: Object,
            default: null
        },
        messages: {
            type: Array,
            default: []
        }
    },
    methods: {
        sendMessage(txt) {
            if (!this.contact) {
                return;
            }
            axios
                .post("/conversation/send", {
                    contact_id: this.contact.id,
                    text: txt
                })
                .then(res => {
                    this.$emit("new", res.data);
                });
        }
    }
};
</script>

<style lang="scss" scoped>
.conversation {
    flex: 5;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    h1 {
        font-size: 21px;
        padding: 10px;
        margin: 0;
        border-bottom: 1px dashed #ddd;
    }
}
</style>
