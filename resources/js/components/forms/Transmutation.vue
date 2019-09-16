<template>
  <div>
    <div>{{HPS}}- {{Grade}}</div>
    <div>{{LPS}}</div>
    <div>{{HINT}}</div>
    <div>{{LINT}}</div>
  </div>
</template>

<script>
export default {
  name: "Transmutation",
  props: ["HPS"],
  data() {
    return {
      grade: ""
    };
  },

  computed: {
    LPS() {
      return Math.round(0.7 * parseInt(this.HPS));
    },
    HINT() {
      return (parseInt(this.HPS) - this.LPS) / 25;
    },
    LINT() {
      return (parseInt(this.HPS) - (this.HPS - this.LPS)) / 10;
    },
    Grade() {
      if (this.HPS && this.HPS - this.HINT) {
        return (this.grade = 99);
      }
    }
  },
  methods: {
    emitToLab(value) {
      this.$emit("insert-score", this.Grade);
    }
  }
};
</script>
