import React from 'react';
import {ListItem} from 'react-native-elements'
import { StyleSheet, Text, View, ScrollView, Button } from 'react-native';
import { Header } from 'react-native-elements';

const list = [
    {
      title: 'Từ vựng Toeic',
      icon: 'assignment',
      navigate: 'Word'
    },
    {
      title: 'Part I',
      icon: 'school',
      navigate: 'Exam'
    },
    {
        title: 'Part II',
        icon: 'school',
        navigate: 'Exam'
    },
    {
        title: 'Part III',
        icon: 'school',
        navigate: 'Exam'
    },
    {
        title: 'Part IV',
        icon: 'school',
        navigate: 'Exam'
    },
    {
        title: 'Part V',
        icon: 'school',
        navigate: 'Exam'
    },
    {
        title: 'Câu yêu thích',
        icon: 'star',
        navigate: 'Exam'
    },
    {
        title: 'Câu làm gần đây',
        icon: 'timelapse',
        navigate: 'Exam'
    },
    {
        title: 'Phần mềm học tiếng anh',
        icon: 'laptop',
        navigate: 'Exam'
    },
    {
        title: 'Cài đặt',
        icon: 'settings',
        navigate: 'Setting'
    }
  ]

export default class Home extends React.Component{
    static navigationOptions = {
        title: 'Home',
    }
    render(){
        const {navigate} = this.props.navigation;
        return(
            
            <View style={styles.container}>
                <Header
                    style={{height:20}}
                    centerComponent={{ text: 'THI TOEIC - TFLAT', style: { color: '#fff' } }}
                />
      
                <ScrollView style={styles.scrollview} showsVerticalScrollIndicator={false}>
                    <View>
                    {
                        list.map((item, i) => (
                        <ListItem
                            onPress={()=> navigate(
                                item.navigate
                            )}
                            key={i}
                            title={item.title}
                            leftIcon={{ name: item.icon }}
                            bottomDivider
                            chevron
                        />
                        ))
                    }
                    </View>
                </ScrollView>
            </View>
        );
    }
    
}
const styles = StyleSheet.create({
    container: {
      flex: 1,
      backgroundColor: '#d2d6d9',
      alignItems: 'center',
    },
    scrollview:{
      width: '100%',
      paddingLeft:16,
      paddingRight:16
    },
  });