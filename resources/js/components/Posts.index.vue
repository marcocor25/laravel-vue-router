<template>
  <div>
    <div class="container">
      <div class="title-wrapper">
        <h1>Tutti i post</h1>
      </div>
    </div>
    <div class="container">
      <div class="card" v-for="post in posts" :key="post.id">
        <h3 class="card-title">{{ post.title }}</h3>
        <p>{{ post.content }}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
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
  width: 75vw;
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

  .card {
    width: calc((100% / 2) - 20px);
    min-height: 250px;
    display: flex;
    flex-direction: column;
    gap: 10px;
    padding: 10px;
    box-shadow: 2px 2px 5px #bbb;
    border-radius: 10px;

    .card-title {
      text-transform: capitalize;
      color: #333;
    }
  }
}
</style>
