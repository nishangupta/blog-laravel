<template>
  <div class="chat-app">
    <Conversation :contact="selectedContact" :messages="messages" @new="saveNewMessage" />
    <ContactsList :contacts="contacts" @selected="startConversationWith" />
  </div>
</template>

<script>
import Conversation from "./Conversation";
import ContactsList from "./ContactsList";

export default {
  name: "chatApp",
  props: {
    user: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      selectedContact: null,
      messages: [],
      contacts: []
    };
  },
  components: {
    Conversation,
    ContactsList
  },
  methods: {
    startConversationWith(contact) {
      axios.get(`/conversation/${contact.id}`).then(response => {
        this.messages = response.data;
        this.selectedContact = contact;
      });
    },
    saveNewMessage(message) {
      this.messages.push(message);
    },
    handleIncoming(message) {
      if (this.selectedContact && message.from == this.selectedContact.id) {
        this.saveNewMessage(message);
        alert(message);
        return;
      }
      alert(message.text);
    }
  },
  mounted() {
    axios.get("/contacts").then(response => {
      this.contacts = response.data;
    });
    Echo.private(`messages.${this.user.id}`).listen("NewMessage", e => {
      this.handleIncoming(e.message);
    });
  }
};
</script>

<style lang="scss" scoped>
.card {
  padding: 0 !important;
}
.chat-app {
  display: flex;
}
</style>
