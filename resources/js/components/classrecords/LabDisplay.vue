
    <template>
  <div class="container">
    <h1>Lab</h1>
    <router-link to="/addScore">add score</router-link>
    <router-link to="/edit">edit</router-link>
    <table border="1" class="text-center table-hover bg-white">
      <thead>
        <tr>
          <th colspan="4"></th>
          <th></th>
        </tr>
        <tr>
          <th>#</th>
          <th>ID Number</th>
          <th>Name</th>
          <th>Course</th>
          <th v-for="title in classRecord" :key="title.id">{{title.titles}}</th>
          <th>Total</th>
          <th>1st Grading</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th colspan="4" class="text-center bg-primary">Male</th>
          <th v-for="(labScore,index) in classRecord" :key="index">{{labScore.lab_score}}</th>
          <th>{{uScore}}</th>
          <td></td>
        </tr>

        <!-- ./ first row  -->

        <tr v-for="(c,index) in classlists" :key="index" v-show="c.gender ==='male'">
          <td>{{c.id}}</td>
          <td></td>
          <td>{{c.student}}</td>
          <td>{{c.course}}</td>
          <td
            v-for="(n,x) in c.classrecords.length"
            :key="x"
          >{{c.classrecords[x].lab_student_scores}}</td>

          <td>{{studentScore[index]}}</td>
        </tr>
        <!-- ./MALE -->
        <tr>
          <th colspan="4" class="text-center bg-primary">Female</th>
          <th v-for="(labScore,index) in classRecord" :key="index">{{labScore.lab_score}}</th>
          <th>{{uScore}}</th>
          <td></td>
        </tr>

        <!-- ./ first row  -->

        <tr v-for="(c,i) in classlists" :key="'labf'+ c.id" v-show="c.gender ==='female'">
          <td>{{i}}</td>
          <td></td>
          <td>{{c.student}}</td>
          <td>{{c.course}}</td>
          <td
            v-for="(n,x) in c.classrecords.length"
            :key="x"
          >{{c.classrecords[x].lab_student_scores}}</td>
          <td>{{studentScore}}</td>
        </tr>
        <!-- ./FEMALE -->
        <tr>
          <th colspan="4" class="text-center">Date</th>
          <th class="relative" v-for="(date,abc) in classRecord" :key="abc">
            <p class="text-danger InVertAlign pr-1">{{date.date}}&nbsp;</p>
          </th>
        </tr>
        <!-- ./DATE -->
        <tr></tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      labStudentScores: [],
      titles: [],
      overAllScores: [],
      studentId: [],
      classlists: [],
      classrecords: []
    };
  },
  methods: {
    displayClasslists() {
      this.$Progress.start();
      axios
        .get(`/api/labview/${this.$route.params.placeName}`)
        .then(({ data }) => {
          this.classlists = data;
          this.$Progress.finish();
        });
    }
  },
  computed: {
    uScore: function() {
      //under score
      for (let index = 0; index < this.classlists.length; index++) {
        let sum = null;
        const element = this.classlists[index].classrecords;
        element.forEach(element => {
          sum += element.lab_score;
        });
        return sum;
      }
    },
    classRecord() {
      for (let index = 0; index < this.classlists.length; index++) {
        const element = this.classlists[index].classrecords;
        // console.log(element);
        return element;
      }
    },
    studentScore() {
      let ele = [];
      for (let index = 0; index < this.classlists.length; index++) {
        const students = this.classlists[index];
        let sum = null;
        const studentItems = students.classrecords;
        ele = studentItems.map((e, index) => {
          return e.lab_student_scores;
        });
        console.log(ele);
      }
      return ele;
    }
  },
  mounted() {
    this.displayClasslists();
  }
};
</script>

<style scoped>
.relative {
  position: relative;
  height: 100px;
  /* border: 3px solid #73ad21; */
}
.InVertAlign {
  transform: rotate(-90deg);
  position: absolute;
  top: 35px;
  left: -45px;
  width: 120px;
  margin-left: 0;
}
</style>