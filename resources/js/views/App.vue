<template>
  <div id="app">
    <header>
      <h1 class="logo">B</h1>
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
import PostsGrid from "./Posts.index.vue";

export default {
  components: {
    PostsGrid,
  },
};
</script>

<style lang="scss" scoped>
#app {
  min-height: 100vh;
  background: #e9ebee;

  header {
    min-height: 9vh;
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 0 20px;
    position: sticky;
    top: 0;
    left: 0;
    box-shadow: 0 5px 5px #e9ebee;
    z-index: 999;
    color: #f5f5f5;
    background: #2c72ba;

    h1 {
      font-weight: 900;
    }

    .logo {
      width: 35px;
      height: 35px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 30px;
      border-radius: 10px;
      user-select: none;
      cursor: pointer;
      color: #2c72ba;
      transition: 500ms ease-in-out;
      background: #f5f5f5;

      &:hover {
        transform: rotate(180deg);
      }
    }
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
