<template>
  <div>
    <form @submit.prevent="insertScore">
      <div v-for="classlist in classlists" :key="classlist.id">
        <input v-model="classlist.id" name="userId" />
      </div>
      <button type="submit">save</button>
    </form>
    <div class="row">
      <div class="col-lg-6">Legend</div>
      <div class="col-lg-6"></div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["classlists"],

  data() {
    return {
      userId: []
    };
  },
  methods: {
    // imported_classlists_id
    insertScore() {
      let students = this.classlists;
      const studentId = this.userId;
      let element = "";

      for (let index = 0; index < students.length; index++) {
        for (let i = 0; i <= index; i++) {
          element = students[index].id;
          // students.push(element);
        }
        axios
          .post("/api/lec/" + element)
          .then(response => (students = response));
      }
      //./imported_classlists_id
    }
  }
};
</script>

<style scoped>
.legend {
  border: 0;
  background-color: transparent;
  font-family: "Times New Roman";
}

input {
  width: 30px;
}
/* input[type="date"] {
  transform: rotate(-90deg);
} */
.btn-primary {
  width: 50px;
  height: 50px;
  padding: 10px;
}
</style>  