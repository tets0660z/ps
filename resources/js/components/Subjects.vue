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
            <router-link to="#">{{ subject.subject_code }}</router-link>
          </td>
          <td>{{ subject.description }}</td>
          <td v-for="classlist in classlists" :key="classlist.id">
            <router-link to="classrecord">{{classlist.sections}}</router-link>
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
      subjects: null,
      classlists: ""
    };
  },
  name: "Subjects",
  methods: {
    displaySubjects() {
      this.$Progress.start();
      axios
        .get("api/subjects")
        .then(({ data }) => this.$Progress.finish((this.subjects = data)));
    },
    displayClasslists() {
      this.$Progress.start();
      axios
        .get("api/classlists")
        .then(({ data }) => this.$Progress.finish((this.classlists = data)));
    }
  },
  created() {
    this.displaySubjects();
    this.displayClasslists();
  }
};
</script>

<style>
</style>