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
        <li
          @click="fetchPosts(n)"
          :class="[currentPage == n ? 'active' : '']"
          class="page"
          v-for="n in lastPage"
          :key="n"
        >
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
    fetchPosts(page = 1) {
      axios
        .get("/api/posts", {
          params: {
            page: page,
          },
        })
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
      width: 25px;
      height: 25px;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 8px;
      border: 1px solid #bbb;
      font-weight: bolder;
      cursor: pointer;
      user-select: none;
      color: #aaa;

      &:hover {
        color: #f5f5f5;
        background: #2c72ba;
      }
    }

    .active {
      color: #f5f5f5;
      background: #2c72ba;
    }
  }
}
</style>
