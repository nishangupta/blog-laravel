<template>
  <div class="feed" ref="feed">
    <ul v-if="contact">
      <li
        v-for="message in messages"
        :key="message.id"
        :class="
                    `message${message.to == contact.id ? ' sent' : ' received'}`
                "
      >
        <div class="text">{{ message.text }}</div>
      </li>
    </ul>
  </div>
</template>
<script>
export default {
  props: {
    contact: {
      type: Object
    },
    messages: {
      type: Array,
      required: true
    }
  },
  methods: {
    scrollToBottom() {
      setTimeout(() => {
        this.$refs.feed.scrollTop =
          this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
      }, 50);
    }
  },
  watch: {
    contact(contact) {
      this.scrollToBottom();
    },
    message(message) {
      this.scrollToBottom();
    }
  }
};
</script>

<style lang="scss" scoped>
.feed {
  background: #f0f0f0;
  height: 100%;
  max-height: 470px;
  overflow: scroll;
  ul {
    list-style-type: none;
    padding: 1rem 5px;
    li {
      margin: 10px 0;
      width: 100%;
      font-weight: bold;
      .text {
        display: inline-block;
        border-radius: 5px;
        padding: 12px;
        background-color: rgb(101, 160, 238);
      }
      &.sent {
        text-align: right;
        .text {
          background-color: #aaa;
        }
      }
      &.received {
        text-align: left;
      }
    }
  }
}
</style>
