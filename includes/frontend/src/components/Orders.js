import React, { Component } from 'react'; 
import Single from './single'; 
import axios from 'axios'; 

export class Orders extends Component {
    state = {
        orders: [], 
        isLoaded: false
    }

    componentDidMount() {
        // let url = window.location.href; 
        // axios.get('http://localhost/wordpress/wp-json/wc/v3/orders')
        // .then(res => this.setState({
        //      orders : res.data, 
        //      isLoaded: true
        // }))
        // .catch( err => console.log(err)); 
        

        axios.get('http://localhost/wordpress/wp-json/wc/v3/orders', {
            headers: {
            Authorization: 'Bearer ' + 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL3dvcmRwcmVzcyIsImlhdCI6MTYwNjcxODU3OCwibmJmIjoxNjA2NzE4NTc4LCJleHAiOjE2MDczMjMzNzgsImRhdGEiOnsidXNlciI6eyJpZCI6IjEifX19.fHWLYy-gZiQXXuS0g5g3ikdNDdFnBla-mbKS_NQ6zG8'
            }

        }).then(res => this.setState({
                 orders : res.data, 
                 isLoaded: true
            }))
        .catch( err => console.log(err)); 

        // fetch('http://localhost/wordpress/wp-json/wc/v3/orders', { 
        //     method: 'get', 
        //      headers: new Headers({
        //       'Authorization' : 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL3dvcmRwcmVzcyIsImlhdCI6MTYwNjcxODU3OCwibmJmIjoxNjA2NzE4NTc4LCJleHAiOjE2MDczMjMzNzgsImRhdGEiOnsidXNlciI6eyJpZCI6IjEifX19.fHWLYy-gZiQXXuS0g5g3ikdNDdFnBla-mbKS_NQ6zG8',
        //     })
        // }).then(res => this.setState({
        //       orders : res.data, 
        //       isLoaded: true
        //   }).catch(err => {
        //       console.log(err)
        //   })

    //     fetch('localhost/wordpress/wp-json/wc/v3/orders')
    //     .then(data => this.setState({
    //         orders : data, 
    //         isLoaded: true
    //    }))
    //    .catch( err => console.log(err)); 
        }

    render() {
        
        const { orders, isLoaded } = this.state; 
        
        if(isLoaded){
            return (
                <div>
                    {orders.map(order => (
                        <Single key={order.id} order = {order}/>
                    ))}
                   
                </div>
            )
        }

        return <h2>Loading...</h2>
       
    }
}

export default Orders
