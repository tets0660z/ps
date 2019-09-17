<template>
  <div class="container">
    <div class="mb-3">
      <span
        class="tab"
        :class="{ activeTab: selectedTab === tab }"
        v-for="(tab, index) in tabs"
        :key="index"
        @click="selectedTab = tab"
      >{{ tab }}</span>
    </div>
    <lec v-show="selectedTab === 'Lec'" :classlists="classlists"></lec>
    <lab v-show="selectedTab === 'Lab'" :classlists="classlists"></lab>
    <LecLab4060 v-show="selectedTab === 'Lec-Lab40-60'" :classlists="classlists"></LecLab4060>
    <LecLab5050 v-show="selectedTab === 'Lec-Lab50-50'" :classlists="classlists"></LecLab5050>
    <LecLab6040 v-show="selectedTab === 'Lec-Lab60-40'"></LecLab6040>
    <!-- {{$route.params.placeName}} -->
  </div>
</template>

<script>
import Lec from "./forms/Lec";
import Lab from "./forms/Lab";
import LecLab4060 from "./forms/LecLab4060";
import LecLab5050 from "./forms/LecLab5050";
import LecLab6040 from "./forms/LecLab6040";

export default {
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
    displayClasslists() {
      this.$Progress.start();
      axios
        .get("/api/classlists/" + this.$route.params.placeName)
        .then(({ data }) => this.$Progress.finish((this.classlists = data)));
    }
  },
  created() {
    this.displayClasslists();
  },
  components: {
    Lec,
    Lab,
    LecLab4060,
    LecLab5050,
    LecLab6040
  }
};
</script>

<style scoped>
.activeTab {
  color: rgb(226, 115, 11);
  cursor: pointer;
  border-bottom: 1px solid rgb(226, 115, 11);
}
.tab {
  cursor: pointer;
  padding: 6px;
}
</style>