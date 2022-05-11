<template>
  <div class="card">
    <h3 class="card-title">
      {{ post.title }}
    </h3>
    <p class="card-category" v-if="post.category">
      <i class="fa-solid fa-tag"></i>
      {{ post.category.name }}
    </p>
    <p class="card-content">
      {{ post.content }}
    </p>
    <ul class="card-tag-wrapper">
      <li class="card-tag" v-for="tag in post.tags" :key="tag.id">
        <i class="fa-solid fa-hashtag"></i>
        {{ tag.name }}
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  props: {
    post: {
      type: Object,
      required: false,
    },
  },
};
</script>

<style lang="scss" scoped>
.card {
  width: calc((100% / 2) - 20px);
  min-height: 260px;
  display: flex;
  flex-direction: column;
  gap: 10px;
  padding: 20px;
  box-shadow: 2px 2px 5px #bbb;
  border-radius: 10px;

  .card-title {
    text-transform: capitalize;
    color: #333;
  }

  .card-category {
    font-weight: bold;
    color: #2c72ba;
  }

  .card-content {
    line-height: 22px;
  }

  .card-tag-wrapper {
    display: flex;
    gap: 10px;

    .card-tag {
      padding: 3px 6px;
      border-radius: 20px;
      font-weight: bold;
      font-size: 12px;
      color: #f5f5f5;
      background: #2c72ba;
    }
  }
}
</style>
