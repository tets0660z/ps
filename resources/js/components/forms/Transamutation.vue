<template></template>

<script>
export default {
  name: "TransmutationLecture",
  props: ["total"],
  data() {
    return {
      HPS: "",
      LPS: "",
      HINT: "",
      LINT: ""
    };
  },
  mounted: {},
  computed: {
    LPS() {
      return 0.7 * parseInt(this.HPS);
    },
    HINT() {
      return (parseInt(this.HPS) * this.LPS) / 25;
    },
    LINT() {
      return (parseInt(this.HPS) - (this.HPS - this.LPS)) / 10;
    }
  }
};
</script>
