<template>
  <div>
    <div class="mb-2">
      <input type="text" placeholder="Search" />
      <table>
        <div>
          FG
          <button type="button" @click="addScore">(+)</button>
          <button type="button" @click="addScore">(-)</button>
        </div>
        <div>
          M
          <button type="button" @click="addScore">(+)</button>
          <button type="button" @click="addScore">(-)</button>
        </div>
        <div>
          F
          <button type="button" @click="addScore">(+)</button>
          <button type="button" @click="addScore">(-)</button>
        </div>
      </table>
    </div>
    <form @submit.prevent="insertLab">
      <table border="1">
        <thead>
          <tr>
            <th>#</th>
            <th>ID Number</th>
            <th>Name</th>
            <th>Course</th>
            <th v-for="(row,index) in form.rows" :key="index">
              <input v-model="row.title" name="title" id="title" class="size d-flex" />
            </th>
            <th>E</th>
            <th>Total</th>
            <th>1st Grading</th>

            <!-- ./ First Grading -->

            <th v-for="(row,index) in form.rows" :key="index">
              <input v-model="row.title" name="title" id="title" class="size d-flex" />
            </th>
            <th>E</th>
            <th>Total</th>
            <th>Midterm</th>

            <!-- ./ Midterm -->
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="4" class="text-center">male</td>
            <td v-for="(row,index) in form.rows" :key="index">
              <input v-model="row.score" name="score" id="score" class="size d-flex" />
            </td>
            <td>
              <input type="text" class="size" v-model="form.exam" name="exam" />
            </td>
            <td>{{total}}</td>
            <th>Grade</th>

            <!-- ./ First Grading -->
            <!-- ./ Midterm -->
          </tr>
          <!-- STUDENT SCORES -->
          <tr>
            <th>1</th>
            <td>20111380</td>
            <td>Terence Ralph C. Raga-as</td>
            <td>BSIT</td>
            <td v-for="(row,index) in form.rows" :key="index">
              <input
                v-model="row.studentScore"
                name="studentScore"
                id="studentScore"
                class="size d-flex"
              />
            </td>
            <td>
              <input type="text" class="size" v-model="form.studentExam" name="studentExam" />
            </td>
            <td>{{studentOverAllTotalScores}}</td>
            <!-- ./ First Grading -->
            <!-- ./ Midterm -->
          </tr>
        </tbody>
      </table>
      <button type="submit">save</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: new Form({
        rows: [],
        exam: "",
        studentExam: ""
        // scores: [],
        // studentScores: [],
        // titles: []
      })
    };
  },
  methods: {
    insertLab() {
      this.form.post("api/laboratory");
    },
    addScore: function() {
      this.form.rows.push({ title: "", score: "", studentScore: "" });
      // this.form.scores.push();
      // this.form.studentScores.push();
      // this.form.titles.push();
    }
  },
  computed: {
    totalScores() {
      return this.form.rows.reduce(
        (acc, item) => acc + parseInt(item.score),
        0
      );
    },
    studentTotalScores() {
      return this.form.rows.reduce(
        (acc, item) => acc + parseInt(item.studentScore),
        0
      );
    },
    studentOverAllTotalScores() {
      return this.studentTotalScores + parseInt(this.form.studentExam);
    },
    total() {
      return this.totalScores + parseInt(this.form.exam);
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

.size {
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