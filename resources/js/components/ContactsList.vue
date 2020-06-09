<template>
  <div class="contacts-list">
    <ul>
      <li
        v-for="(contact, index) in contacts"
        :key="contact.id"
        @click="selectContact(index, contact)"
        :class="{ selected: index == selected }"
      >
        <div class="avatar">
          <img :src="contact.profile_image" alt />
        </div>
        <div class="contact">
          <p class="name">{{ contact.name }}</p>
          <p class="email">{{ contact.email }}</p>
          <span class="unread" v-if="contact.unread">{{contact.unread}}123</span>
        </div>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  props: {
    contacts: {
      type: Array,
      default: []
    }
  },
  data() {
    return {
      selected: 0
    };
  },
  methods: {
    selectContact(index, contact) {
      this.selected = index;
      this.$emit("selected", contact);
    }
  }
};
</script>

<style lang="scss" scoped>
.contacts-list {
  flex: 2;
  max-height: 500px;
  overflow: scroll;
  border-left: 1px solid lightgray;
  ul {
    list-style-type: none;
    padding-left: 0;
    li {
      display: flex;
      padding: 2px;
      border-bottom: 1px solid #ddd;
      height: 80px;
      position: relative;
      cursor: pointer;
      &.selected {
        background: #eee;
      }

      .avatar {
        flex: 1;
        display: flex;
        align-items: center;
        img {
          width: 35px;
          border-radius: 50%;
          margin: 0 auto;
        }
      }
      .contact {
        flex: 3;
        font-size: 10px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: center;
        p {
          margin: 0;
          &.name {
            font-weight: bold;
          }
        }
      }
    }
  }
}
</style>
