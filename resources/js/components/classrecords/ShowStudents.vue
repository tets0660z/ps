<template>
  <div class="container-fluid">
    <table border="1">
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
          <th v-for="title in classlists" :key="title.id">{{title.activity_title}}</th>
          <th>Total</th>
          <th>1st Grading</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th colspan="4" class="text-center bg-primary">Male</th>
          <th v-for="(labScore,index) in classlists" :key="index">{{labScore.hps}}</th>
          <!-- <th>{{uScore}}</th> -->
          <td></td>
        </tr>

        <!-- ./ first row  -->

        <tr v-for="(c,index) in classlists" :key="index" v-show="c.gender ==='male'">
          <td>{{c.id}}</td>
          <td></td>
          <td>{{c.name}}</td>
          <td>{{c.course}}</td>
          <td v-for="(x,i) in classRecord" :key="i">{{x.scores}}</td>
          <!-- <td>{{studentScore[index]}}</td> -->
        </tr>
        <!-- ./MALE -->
        <tr>
          <th colspan="4" class="text-center bg-primary">Female</th>
          <th v-for="(labScore,index) in classlists" :key="index">{{labScore.hps}}</th>
          <!-- <th>{{uScore}}</th> -->
          <td></td>
        </tr>

        <!-- ./ first row  -->

        <tr v-for="(c,i) in classlists" :key="c.id" v-show="c.gender ==='female'">
          <td>{{i}}</td>
          <td></td>
          <td>{{c.name}}</td>
          <td>{{c.course}}</td>
          <!-- <td v-for="(n,x) in c.classlists.length" :key="x">{{c.classlists[x].scores}}</td> -->
          <!-- <td>{{studentScore}}</td> -->
        </tr>
        <!-- ./FEMALE -->
        <tr>
          <th colspan="4" class="text-center">Date</th>
          <th class="relative" v-for="(date,abc) in classlists" :key="abc">
            <p class="text-danger InVertAlign pr-1">{{date.dates}}&nbsp;</p>
          </th>
        </tr>
        <!-- ./DATE-->
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
        .get(`/api/showstudents/${this.$route.params.placeName}`)
        .then(({ data }) => {
          this.classlists = data;
          this.$Progress.finish();
        });
    }
  },
  computed: {
    classRecord: function() {
      for (let index = 0; index < this.classlists.length; index++) {
        const element = this.classlists;
        console.log(element);
        return element;
      }
      // const record = this.classlists;
      // var newArr = [];
      // // convert to 2d array
      // while (record.length) newArr.push(record.splice(0, 1));
      // console.log(newArr);
      // return newArr;
    },

    uScore: function() {
      //under score
      // for (let index = 0; index < this.classlists.length; index++) {
      //   let sum = null;
      //   const element = this.classlists[index].classrecords;
      //   element.forEach(element => {
      //     sum += element.lab_score;
      //   });
      //   return sum;
      // }
    }
  },
  mounted() {
    this.displayClasslists();
    // this.classRecord();
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