import React from 'react';
import ReactDom from 'react-dom';
import HomeContainer from "./containers/HomeContainer.js";

class App extends React.Component {
    constructor(props) {
        super(props)
    }

    render() {
        return (
            <div>
                {
                    //Navbar
                }
                <HomeContainer/>
            </div>
        )
    }
}

ReactDom.render(<App/>, document.getElementById('root'));