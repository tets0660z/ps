<template>
  <div class="container">
    {{this.$route.params.placeName}}
    {{classlists}}
  </div>
</template>

<script>
export default {
  data() {
    return {
      classlists: ""
    };
  },
  methods: {
    displayClasslists() {
      this.$Progress.start();
      axios
        .get("/api/classlists/" + this.$route.params.placeName)
        .then(({ data }) => this.$Progress.finish((this.classlists = data)));
    }
  },
  create() {
    this.displayClasslists();
    console.log(this.classlists);
  }
};
</script>

<style>
</style>