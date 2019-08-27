<template>
  <div>
    <form @submit.prevent="insertLecture">
      <div class="form-group">
        <label>title</label>
        <input v-model="form.title" type="text" name="title" id="title" />
        <label>description</label>
        <input v-model="form.description" type="text" name="description" id="description" />
      </div>
      <button type="submit" class="btn btn-primary">save</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: new Form({
        title: "",
        description: ""
      })
    };
  },
  methods: {
    insertLecture() {
      this.form.post("api/lecture");
    }
  }
};
</script>

<style scoped>
/* input[type="text"] {
  border: 0;
  background-color: transparent;
  font-family: "Times New Roman";
} */
.quiz {
  width: 30px;
}
.btn-primary {
  width: 50px;
  height: 50px;
  padding: 10px;
}
</style>