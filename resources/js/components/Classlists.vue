<template>
  <div class="container">
    <h1>Subjects</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Section</th>
          <th scope="col">Subject</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="section in sections" :key="section.id">
          <td>
            <!-- <router-link to="/classrecord"></router-link> -->
            <router-link
              :to="{name:'classrecord',params:{placeName: section.sections}}"
            >{{section.sections}}</router-link>
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
      sections: null,
      classlists: ""
    };
  },
  name: "Classlists",
  methods: {
    displaySubjects() {
      this.$Progress.start();
      axios
        .get("api/sections")
        .then(({ data }) => this.$Progress.finish((this.sections = data)));
    }
  },
  created() {
    this.displaySubjects();
  }
};
</script>

<style>
</style>