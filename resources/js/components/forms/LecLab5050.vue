<template>
  <div>
    <div class="mb-2">
      <button type="button" @click="addScore">FG(+)</button>
      <button type="button" @click="addScore">M(+)</button>
      <button type="button" @click="addScore">F(+)</button>
      <!-- <input type="text" placeholder="Search" /> -->
    </div>
    <form @submit.prevent="insertLaboratory">
      <table border="1" class="table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>ID Number</th>
            <th>Name</th>
            <th>Course</th>
            <th v-for="(title,index) in form.titles" :key="index">
              <input v-model="title.value" class="quiz d-flex" />
            </th>
            <th>Total</th>
            <th>1st Grading</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th colspan="4" class="text-center bg-primary">Male</th>
            <td v-for="(overAllScore,index) in form.overAllScores" :key="index">
              <input v-model="overAllScore.value" class="quiz d-flex" />
            </td>
            <th>{{overAllScores}}</th>
            <td v-text="transScore"></td>
          </tr>

          <!-- ./ first row  -->

          <tr
            v-for="(classlist,index) in classlists"
            :key="'labm'+ classlist.id"
            v-show="classlist.gender ==='male'"
          >
            <td>{{index +1}}</td>
            <td></td>
            <td>{{classlist.student}}</td>
            <td>{{classlist.course}}</td>
            <td v-for="(labStudentScore,i) in form.labStudentScores" :key="i">
              <input v-model="labStudentScore.value[index]" />
            </td>

            <td>{{studentTotalScores[index]}}</td>
          </tr>
          <!-- ./MALE -->
          <tr>
            <th colspan="4" class="text-center bg-primary">Female</th>
            <td v-for="(overAllScore,index) in form.overAllScores" :key="index">
              <input v-model="overAllScore.value" class="quiz d-flex" />
            </td>
            <th>{{overAllScores}}</th>
            <td></td>
          </tr>

          <!-- ./ first row  -->

          <tr
            v-for="(classlist,index) in classlists"
            :key="'labf'+ classlist.id"
            v-show="classlist.gender ==='female'"
          >
            <td>{{index +1}}</td>
            <td></td>
            <td>{{classlist.student}}</td>
            <td>{{classlist.course}}</td>
            <td v-for="(labStudentScore,i) in form.labStudentScores" :key="i">
              <input v-model="labStudentScore.value[index]" v-on:keyup="emitToClassrecord" />
            </td>

            <td>{{studentTotalScores[index]}}</td>
          </tr>
          <!-- ./FEMALE -->
        </tbody>
      </table>
      <Transmutation :emitToLab="newGrade"></Transmutation>
    </form>
  </div>
</template>

<script>
import Transmutation from "./Transmutation";
export default {
  props: ["classlists"],
  components: {
    Transmutation
  },
  data() {
    return {
      form: new Form({
        labStudentScores: [],
        studentExam: 0,
        titles: [],
        overAllScores: []
      }),
      returnGrade: ""
    };
  },

  methods: {
    // referenced to classrecord.
    newGrade(value) {
      this.returnGrade = value;
    },
    transScore(value) {
      this.returnGrade = value;
    },
    addScore: function() {
      this.form.labStudentScores.push({ value: [] });
      this.form.titles.push({ value: [] });
      this.form.overAllScores.push({ value: [] });
    }
  },
  computed: {
    studentTotalScores: function() {
      return this.classlists.map((c, index) => {
        return this.form.labStudentScores.reduce((acc, item) => {
          const value = parseInt(item.value[index], 10) || 0;
          return acc + value;
        }, 0);
      });
    },
    overAllScores: function() {
      return this.form.overAllScores.reduce(
        (acc, item) => acc + parseInt(item.value, 10) || 0,
        0
      );
    },

    studentTotal: function() {
      return parseInt(this.form.studentExam) + this.studentTotalScores;
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