<template>
  <div class="container">
    <ul v-for="c in classlists" :key="c.id">{{c.sections}}</ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      labStudentScores: "",
      titles: "",
      overAllScores: "",
      studentId: "",
      classlists: ""
    };
  },
  methods: {
    displayClasslists() {
      this.$Progress.start();
      axios
        .get("/api/labview/" + this.$route.params.placeName)
        .then(({ data }) => this.$Progress.finish((this.classlists = data)));
    }
  },
  created() {
    this.displayClasslists();
  }
};
</script>

<style>
</style>