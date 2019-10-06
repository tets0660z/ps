<template>
  <div class="container-fluid">
    <div class="py-3">
      <span
        class="tab"
        :class="{ activeTab: selectedTab === tab }"
        v-for="(tab, index) in tabs"
        :key="index"
        @click="selectedTab = tab"
      >{{ tab }}</span>
    </div>
    <lec v-show="selectedTab === 'Lec'" :classlists="classlists" :instructor_id="userid"></lec>
    <lab v-show="selectedTab === 'Lab'" :classlists="classlists" :instructor_id="userid"></lab>
    <LecLab4060 v-show="selectedTab === 'Lec-Lab40-60'" :classlists="classlists"></LecLab4060>
    <LecLab5050 v-show="selectedTab === 'Lec-Lab50-50'" :classlists="classlists"></LecLab5050>
    <LecLab6040 v-show="selectedTab === 'Lec-Lab60-40'"></LecLab6040>
    <div class="footer mt-auto py-3 text-danger"></div>
  </div>
</template>

<script>
import Lec from "./forms/Lec";
import Lab from "./forms/Lab";
import LecLab4060 from "./forms/LecLab4060";
import LecLab5050 from "./forms/LecLab5050";
import LecLab6040 from "./forms/LecLab6040";

export default {
  props: ["userid"],
  data() {
    return {
      tabs: ["Lec", "Lab", "Lec-Lab40-60", "Lec-Lab50-50", "Lec-Lab60-40"],
      selectedTab: "Lec",
      classlists: "",
      gender: "female",
      labScore: []
    };
  },
  methods: {
    displaySections() {
      this.$Progress.start();
      axios
        .get("/api/classlists/" + this.$route.params.placeName)
        .then(({ data }) => this.$Progress.finish((this.classlists = data)));
    }
  },
  created() {
    this.displaySections();
    // console.log(this.userId);
  },
  components: {
    // forms
    Lec,
    Lab,
    LecLab4060,
    LecLab5050,
    LecLab6040
    // display class records
  }
};
</script>

<style scoped>
.activeTab {
  color: rgb(226, 115, 11);
  /* color: #000; */
  cursor: pointer;
  border-bottom: 1px solid rgb(226, 115, 11);
}
.tab {
  cursor: pointer;
  padding: 6px;
}
.footer {
  position: fixed;
  height: 100px;
  top: 10;
  bottom: 0;
  width: 100%;
  /* background: bisque; */
}
</style>