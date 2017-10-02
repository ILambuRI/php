var app = new Vue({

  el: '#application',
  data: {
    autoArr: '',
    selector: '',
    objParams: {},
    
    mark: 'Mark',
    model: 'Model',
    year: 'Year',
    engine: 'Engine',
    color: 'Color',
    speed: 'Speed',

    allMark: '',
    allModel: '',
    allYear: '',
    allEngine: '',
    allColor: '',
    allSpeed: '',

    userFirstname : '',
    userLastname : '',
    userPayment : 'card',
    userAutoId: ''
  },

  created() {
    this.getXmlHttp('getAllDistinct')
    
    this.getXmlHttp('getAutoList')
    this.selector = 'table'
  },

  computed: {
    validAccess() {
      if (this.validFirstname && this.validLastname) {
        return true
      }

      return false
    },

    validFirstname() {
      if (this.userFirstname.length > 2) {
        return true
      }

      return false
    },

    validLastname() {
      if (this.userLastname.length > 2) {
        return true
      }

      return false
    }
  },

  methods: {
    setMark(val) {
      this.mark = val
      this.objParams.mark = val
      
      this.getXmlHttp('getAutoByParams', this.objParams)
    },

    setModel(val) {
      this.model = val
      this.objParams.model = val
      
      this.getXmlHttp('getAutoByParams', this.objParams)
    },

    setYear(val) {
      this.year = val
      this.objParams.year = val
      
      this.getXmlHttp('getAutoByParams', this.objParams)
    },

    setEngine(val) {
      this.engine = val
      this.objParams.engine = val
      
      this.getXmlHttp('getAutoByParams', this.objParams)
    },

    setColor(val) {
      this.color = val
      this.objParams.color = val
      
      this.getXmlHttp('getAutoByParams', this.objParams)
    },

    setSpeed(val) {
      this.speed = val
      this.objParams.speed = val
      
      this.getXmlHttp('getAutoByParams', this.objParams)
    },

    getXmlHttp(postName, postObj)
    {
      this.selector = 'card'    
      let sendString = ''

      if (postName && postObj) {
         sendString = postName + '=' + JSON.stringify(postObj)
      }
      else {
        sendString += postName + '={}'
      }

      let xhr

      try {
        xhr = new ActiveXObject("Msxml2.XMLHTTP")
      }
      catch (e) {
        try {
            xhr = new ActiveXObject("Microsoft.XMLHTTP")
        }
        catch (E) {
            xhr = false
        }
      }

      if (!xhr && typeof XMLHttpRequest != 'undefined') {
          xhr = new XMLHttpRequest()
      }
      /* Home */
      xhr.open('POST', 'http://php/SOAP/task2/client/autoClient.php', true)
      /* Work */
      //xhr.open('POST', 'http://php/SOAP/task2/client/autoClient.php', true)
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")
      xhr.send(sendString)
      xhr.onreadystatechange = () => {
        if (xhr.readyState != 4) return

        if(xhr.status == 200) {
          let result = JSON.parse(xhr.responseText)

          if (result.error) {
            alert( 'Error: ' + result.error )
          }
          if (result.faultstring) {
            alert( 'Error from the server: Function[' + result.faultcode + '] Drop error: [' + result.faultstring + ']' )
          }
          
          let x = /Distinct/g.exec(postName)
          let y = /add/g.exec(postName)
          if (x) {
            this.setOptions(JSON.parse(xhr.responseText))
          }
          else if (y) {
            if (JSON.parse(xhr.responseText).success) {
              this.selector = 'success'
            }
          }
          else {
            this.autoArr = JSON.parse(xhr.responseText)
          }
        }

        if (xhr.status != 200) {
          alert( 'Error: ' + (xhr.status ? xhr.statusText : 'request failed status != 200 :(') )
          return
        }
      }
    },

    setOptions(jsonObj) {
      jsonObj.forEach((element) => {
          element.forEach((el) => {
            if (el.mark) this.allMark = element
            if (el.model) this.allModel = element
            if (el.year) this.allYear = element
            if (el.engine) this.allEngine = element
            if (el.color) this.allColor = element
            if (el.speed) this.allSpeed = element
          })
        
      })
    },

    clearBtn() {
      this.objParams = {}
      this.mark = 'Mark'
      this.model = 'Model'
      this.year = 'Year',
      this.engine = 'Engine'
      this.color = 'Color'
      this.speed = 'Speed'

      this.getXmlHttp('getAutoList')
      this.selector = 'table'
    },

    showOrderForm(auto_id) {
      this.objParams = {}
      this.mark = 'Mark'
      this.model = 'Model'
      this.year = 'Year',
      this.engine = 'Engine'
      this.color = 'Color'
      this.speed = 'Speed'
      this.userAutoId = auto_id

      this.getXmlHttp('getAutoById', auto_id)

      this.selector = 'form'
    },

    sendOrder() {
      let params = {
        auto_id: this.userAutoId,
        firstname: this.userFirstname,
        lastname: this.userLastname,
        payment: this.userPayment
      }

      this.getXmlHttp('addOrder', params)
    }
  }

})
