<template>
  <div>
    <div class="container">
      <div class="title-wrapper">
        <h1>Tutti i post</h1>
      </div>
    </div>
    <div class="container">
      <PostCard v-for="post in posts" :key="post.id" :post="post" />
    </div>
  </div>
</template>

<script>
import PostCard from "../components/PostCard.vue";

export default {
  components: {
    PostCard,
  },
  data() {
    return {
      posts: [],
    };
  },
  methods: {
    fetchPosts() {
      axios
        .get("/api/posts")
        .then((res) => {
          const { posts } = res.data;

          this.posts = posts;
        })
        .catch((err) => {
          console.warn(err);
        });
    },
  },
  mounted() {
    this.fetchPosts();
  },
};
</script>

<style lang="scss" scoped>
.container {
  width: 70vw;
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 20px;
  margin: 0 auto;
  padding: 20px;
  background: white;

  .title-wrapper {
    padding: 10px;
    flex-grow: 1;

    h1 {
      padding-bottom: 10px;
      border-bottom: 1px solid #333;
      font-size: 36px;
      color: #333;
    }
  }
}
</style>
