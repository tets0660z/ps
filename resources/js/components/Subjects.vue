<template>
  <div class="container">
    <h1>Subjects</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Subject Code</th>
          <th scope="col">Title</th>
          <th scope="col">Section</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="subject in subjects" :key="subject.id">
          <td>{{subject.id}}</td>
          <td>
            <router-link to="#">{{ subject.subjects }}</router-link>
          </td>
          <td>Web Programming 1</td>
          <td>
            <router-link to="classrecord">IDC1</router-link>
            <router-link to="classrecord">IDC2</router-link>
            <router-link to="classrecord">IDA1</router-link>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      subjects: null
    };
  },
  name: "Subjects",
  methods: {
    displaySubjects() {
      // When Subjects.vue is first loaded start the progress bar
      this.$Progress.start();
      axios
        .get("api/subjects")
        .then(({ data }) => this.$Progress.finish((this.subjects = data)));
    }
  },
  created() {
    this.displaySubjects();
  }
};
</script>

<style>
</style>