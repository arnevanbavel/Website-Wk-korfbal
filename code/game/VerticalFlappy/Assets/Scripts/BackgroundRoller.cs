using UnityEngine;
using System.Collections;

public class BackgroundRoller : MonoBehaviour {

	public float scrollSpeed = 0f;
	public float tileSizeZ;
	public bool tileChange = false;
	public float speedUpAmount = 1f;
	public float speedUpRepeatTime = 10f;
	private float time = 0f;
	private Vector3 startPosition;
	private float seconde;

	// Use this for initialization
	void Start () 
	{
		seconde = Time.deltaTime / 2;
		startPosition = transform.position;
	}
	
	// Update is called once per frame
	void Update () 
	{
		float newPosition = Mathf.Repeat(Time.time * scrollSpeed, tileSizeZ);
		transform.position = startPosition + Vector3.up * newPosition;
		time += seconde;

		if (time >= speedUpRepeatTime) 
		{
			StartCoroutine("mSpeedUp");
			time -= speedUpRepeatTime ;
		}
	}

	void mSpeedUp() 
	{
		scrollSpeed += speedUpAmount;
		if (tileChange) 
		{
			tileSizeZ += tileSizeZ;
		}
	}
}
