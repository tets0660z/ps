<template>
  <div>
    <form @submit.prevent="insertLecture" @keydown="form.onKeydown($event)">
      <div class="form-group">
        <label>title</label>
        <input
          v-model="form.title"
          type="text"
          name="title"
          class="form-control"
          :class="{ 'is-invalid': form.errors.has('title') }"
        />
        <has-error :form="form" field="title"></has-error>
      </div>

      <button :disabled="form.busy" type="submit" class="btn btn-primary">Log In</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: new Form({
        title: ""
      })
    };
  },
  methods: {
    insertLecture() {
      this.form.post("api/lectures").then(({ data }) => {
        console.log(data);
      });
    }
  },

  name: "UserInformation"
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