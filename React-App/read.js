import React, { useEffect, useState } from 'react';
import { Table, Button } from 'semantic-ui-react';
import axios from 'axios';
import { Link } from 'react-router-dom';

export default function Read() {
    const [APIData, setAPIData] = useState([]);
useEffect(() => {
    axios.get(`https://61f0bb51e386270017fe1e53.mockapi.io/formData`)
    .then((response) => {
        setAPIData(response.data);
    })
}, [])
const setData = (data) => {
    
    console.log(data);
    localStorage.setItem('id', data.id);
    localStorage.setItem('firstName', data.firstName);
    localStorage.setItem('lastName', data.lastName);
    localStorage.setItem('checkbox', data.checkbox);
    
}
const getData = () => {
    axios.get(`https://61f0bb51e386270017fe1e53.mockapi.io/formData`)
        .then((getData) => {
             setAPIData(getData.data);
         })
}
const onDelete = (id) => {
    axios.delete(`https://61f0bb51e386270017fe1e53.mockapi.io/formData/${id}`)
    .then(() => {
        getData();
    })
}
    return (
        <div>
            <Link to={`/create`}><Button className='top-button'>+ Add User</Button></Link>
            <Table celled>
                <Table.Header>
                    <Table.Row>
                    <Table.HeaderCell>ID</Table.HeaderCell>
                        <Table.HeaderCell>First Name</Table.HeaderCell>
                        <Table.HeaderCell>Last Name</Table.HeaderCell>
                        <Table.HeaderCell>Checked</Table.HeaderCell>
                        <Table.HeaderCell>Edit</Table.HeaderCell>

                    </Table.Row>
                </Table.Header>

                <Table.Body>
                    {APIData.map((data) => {
                         return (
                        <Table.Row>
                            <Table.Cell>{data.id}</Table.Cell>
                            <Table.Cell>{data.firstName}</Table.Cell>
                            <Table.Cell>{data.lastName}</Table.Cell>
                            <Table.Cell>{data.checkbox ? 'Checked' : 'Unchecked'}</Table.Cell>
                            <Link to='/update'>
                                <Table.Cell>
                                    <Button onClick={() => setData(data)}>Edit</Button>
                                </Table.Cell>
                            </Link>
                            <Table.Cell><Button onClick={() => onDelete(data.id)}>Delete</Button></Table.Cell>
                        </Table.Row>
            )})}
                </Table.Body>
            </Table>
        </div>
    )
}