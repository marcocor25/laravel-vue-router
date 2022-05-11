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
    <div class="container">
      <ul class="pagination">
        <li class="page" v-for="n in lastPage" :key="n">
          {{ n }}
        </li>
      </ul>
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
      lastPage: 0,
      currentPage: 1,
    };
  },
  methods: {
    fetchPosts() {
      axios
        .get("/api/posts")
        .then((res) => {
          const { posts } = res.data;

          const { data, last_page, current_page } = posts;

          this.posts = data;

          this.lastPage = last_page;

          this.currentPage = current_page;
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
  width: 80vw;
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 20px;
  margin: 0 auto;
  padding: 20px;
  background: #ffffff;

  .title-wrapper {
    padding: 10px;
    flex-grow: 1;

    h1 {
      padding-bottom: 10px;
      border-bottom: 0.5px solid #333;
      font-size: 36px;
      color: #333;
    }
  }

  .pagination {
    display: flex;
    gap: 10px;

    .page {
      width: 20px;
      height: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 50%;
      border: 1px solid #999;
      font-weight: bolder;
      font-size: 12px;
      color: #555;
    }
  }
}
</style>
