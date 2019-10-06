<template>
  <div class="container">
    <h1>Subjects</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Section</th>
          <th scope="col">Subject</th>
          <th scope="col">Grading Period</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="section in sections" :key="section.id">
          <td>
            <router-link to="/classrecord"></router-link>
            <router-link
              :to="{name:'classrecord',params:{placeName: section.section}}"
            >{{section.section}}</router-link>
            <router-link :to="{name:'labview',params:{placeName: section.section}}">view</router-link>
          </td>
          <td>
            <router-link
              :to="{name:'classrecord',params:{placeName: section.section}}"
            >{{section.subject}}</router-link>
          </td>
          <td>
            <select>
              <option value="volvo">First Grading</option>
              <option value="mercedes">Midterm</option>
              <option value="audi">Finals</option>
            </select>
            <select>
              <option value="volvo">Lec</option>
              <option value="mercedes">Lab</option>
              <option value="audi">LecLab 40-60</option>
              <option value="audi">LecLab 40-60</option>
              <option value="audi">LecLab 40-60</option>
            </select>
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