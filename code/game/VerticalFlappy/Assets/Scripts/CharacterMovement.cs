using UnityEngine;
using System.Collections;

public class CharacterMovement : MonoBehaviour 
{
	public float force = 5f;
	public bool jumpAble = true;
	public bool power = false;
	private float MuchUsedValue = 0.5f;
	public float SideMovementDuringSpace = 0f;

	// Use this for initialization
	void Start () 
	{

	}
	
	// Update is called once per frame
	void Update () 
	{
		if (Input.GetKey (KeyCode.Space) && jumpAble) 
		{
			this.gameObject.rigidbody2D.velocity = new Vector2(SideMovementDuringSpace, -force);
			jumpAble = false;
			StartCoroutine("mJumpAble");
		}

		if (Input.GetKey(KeyCode.LeftArrow))
		{
			Vector3 position = this.transform.position;
			position.x -= MuchUsedValue;
			this.transform.position = position;
		}
		if (Input.GetKey (KeyCode.RightArrow)) 
		{
			Vector3 position = this.transform.position;
			position.x += MuchUsedValue;
			this.transform.position = position;
		}
	}

	IEnumerator mJumpAble()
	{
		power = true;
		yield return new WaitForSeconds(MuchUsedValue);
		this.gameObject.rigidbody2D.velocity = new Vector2(-SideMovementDuringSpace, force);
		yield return new WaitForSeconds(MuchUsedValue);
		this.rigidbody2D.velocity = Vector2.zero;
		power = false;
		jumpAble = true;
	}
}
