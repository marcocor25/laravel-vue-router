<template>
  <div id="app">
    <header>
      <h1>Boolbook</h1>
    </header>
    <main>
      <PostsGrid />
    </main>
    <footer>
      <h1>Footer</h1>
    </footer>
  </div>
</template>

<script>
import PostsGrid from "../components/Posts.index.vue";

export default {
  components: {
    PostsGrid,
  },
};
</script>

<style lang="scss" scoped>
#app {
  background: #e9ebee;

  header {
    min-height: 9vh;
    display: flex;
    align-items: center;
    padding: 0 20px;
    position: sticky;
    top: 0;
    left: 0;
    box-shadow: 0 5px 5px #e9ebee;
    color: #f5f5f5;
    background: #2c72ba;
  }

  footer {
    min-height: 30vh;
    display: flex;
    align-items: center;
    padding: 0 20px;
    color: #f5f5f5;
    background: #2c72ba;
  }
}
</style>
