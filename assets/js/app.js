import React from 'react';
import ReactDom from 'react-dom';
import HomeContainer from "./containers/HomeContainer.js";
import {HomeNav} from "./components"

class App extends React.Component {
    constructor(props) {
        super(props)
        this.toggle = this.toggle.bind(this)
    }

    toggle(attr) {
        this.setState(prevState => ({
            [attr]: !prevState.send(attr)
        }))
    }

    render() {
        return (
            <div>
                <HomeNav/>
                <HomeContainer/>
            </div>
        )
    }
}

ReactDom.render(<App/>, document.getElementById('root'));