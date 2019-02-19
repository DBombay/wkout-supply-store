import React from 'react'
import {Card, CardBody, Collapse} from 'reactstrap'

export default class Category extends React.Component {
    constructor(props) {
        super(props);
        this.toggle = this.toggle.bind(this);
        this.state = {
            isOpen: false,
            subCategories: []
        }
    }

    componentDidMount() {
        fetch('/subcategories')
            .then(results => {
                return results.json();
            })
            .then(data => {
                let categories = data.map((category) => {
                    return (
                        <Category id={category.id} key={category.id} name={category.name}
                                  description={category.description}/>
                    )
                })
                this.setState({categories: categories})
            })
    }

    toggle() {
        this.setState({isOpen: !this.state.isOpen})
    }

    render() {
        return (
            <Card key={this.props.id} className='container-fluid h-100 bg-light' onClick={this.toggle}>
                <CardBody className="row h-100 align-items-center">
                    <h2 className="col-7 float-left">{this.props.name}</h2>
                    <div className="col-5 float-right">
                        <em>{this.props.description}</em>
                        <span
                            className={`fa fa-lg ${this.state.isOpen ? 'fa-caret-down' : 'fa-caret-left'} float-right align-self-center`}/>
                    </div>
                </CardBody>
                <Collapse isOpen={this.state.isOpen}>
                    <hr className="my-2"/>
                    <CardBody>
                        {this.state.subCategories}
                    </CardBody>
                </Collapse>
            </Card>
        )
    }
}